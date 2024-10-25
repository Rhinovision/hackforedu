import requests
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
from flask import Flask, render_template, request, send_file, redirect, url_for
import io
import base64

app = Flask(__name__)

# URL of the PHP API
url = "http://localhost/dashboard_estudiantil/api.php"

# Fetch data from the PHP API
try:
    response = requests.get(url)
    response.raise_for_status()  # Check if the request was successful
    data = response.json()  # Convert the response to JSON format
except requests.exceptions.HTTPError as err:
    raise SystemExit(f"HTTP error occurred: {err}")
except requests.exceptions.RequestException as err:
    raise SystemExit(f"Request error occurred: {err}")
except ValueError:
    raise SystemExit("Error decoding JSON")

# Convert the API data into Pandas DataFrames
usuarios_df = pd.DataFrame(data.get('usuarios', []))
materias_df = pd.DataFrame(data.get('materias', []))
inscripciones_df = pd.DataFrame(data.get('inscripciones', []))
tareas_df = pd.DataFrame(data.get('tareas', []))
eventos_df = pd.DataFrame(data.get('eventos', []))
calificaciones_df = pd.DataFrame(data.get('calificaciones', []))

# Example function to filter and sum data based on 'N_control'
def filter_and_sum(df, N_control):
    filtered_df = df[df['N_control'] == N_control]
    if filtered_df.empty:
        return None
    return filtered_df.drop(columns=['N_control']).sum(axis=1).values[0]

# Function to generate a plot for a specific N_control
def plot_predictions_for_control(N_control):
    # Example analysis: sum data from different categories
    categorias = ['usuarios', 'materias', 'inscripciones', 'tareas', 'eventos', 'calificaciones']
    dfs = [usuarios_df, materias_df, inscripciones_df, tareas_df, eventos_df, calificaciones_df]
    predicciones = []
    
    for df, categoria in zip(dfs, categorias):
        suma = filter_and_sum(df, N_control)
        if suma is not None:
            predicciones.append((categoria, suma))

    if not predicciones:
        return None

    predictions_df = pd.DataFrame(predicciones, columns=['Categoria', 'Prediccion'])

    # Plot the data
    plt.figure(figsize=(10, 6))
    sns.scatterplot(data=predictions_df, x='Categoria', y='Prediccion')
    plt.axhline(0.5, ls='--', color='gray')
    plt.ylim(0, 1)
    plt.xlabel('Categoría')
    plt.ylabel('Predicción')
    plt.title(f'Predicción para N_control {N_control}')

    # Add labels
    for line in range(0, predictions_df.shape[0]):
        plt.text(
            predictions_df.Categoria.iloc[line],
            predictions_df.Prediccion.iloc[line],
            predictions_df.Categoria.iloc[line],
            horizontalalignment='left',
            size='small',
            color='black',
            weight='semibold'
        )

    img = io.BytesIO()
    plt.savefig(img, format='png')
    img.seek(0)
    plt.close()

    return img

# New function for total category analysis
def plot_total_analysis():
    # Example of total sum across categories
    totals = {
        'usuarios': usuarios_df.drop(columns=['N_control']).sum().sum(),
        'materias': materias_df.drop(columns=['N_control']).sum().sum(),
        'inscripciones': inscripciones_df.drop(columns=['N_control']).sum().sum(),
        'tareas': tareas_df.drop(columns=['N_control']).sum().sum(),
        'eventos': eventos_df.drop(columns=['N_control']).sum().sum(),
        'calificaciones': calificaciones_df.drop(columns=['N_control']).sum().sum(),
    }

    totals_df = pd.DataFrame(list(totals.items()), columns=['Categoria', 'Total'])

    plt.figure(figsize=(10, 6))
    sns.barplot(data=totals_df, x='Categoria', y='Total')
    plt.xlabel('Categoría')
    plt.ylabel('Total')
    plt.title('Análisis Total de Categorías')

    img = io.BytesIO()
    plt.savefig(img, format='png')
    img.seek(0)
    plt.close()

    return img

# Flask routes
@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        N_control = request.form['N_control']
        img = plot_predictions_for_control(N_control)
        if img:
            img_data = base64.b64encode(img.getvalue()).decode('utf-8')
            return render_template('index.html', img_data=img_data, N_control=N_control)
        else:
            return render_template('index.html', error=f'N_control {N_control} no encontrado.')
    return render_template('index.html')

@app.route('/total-analysis')
def total_analysis():
    img = plot_total_analysis()
    img_data = base64.b64encode(img.getvalue()).decode('utf-8')
    return render_template('total_analysis.html', img_data=img_data)

if __name__ == '__main__':
    app.run(debug=True)
