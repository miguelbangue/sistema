from PyQt5.QtWidgets import QApplication, QLabel

app = QApplication([])  #sirve para crear la ventana 
label = QLabel('¡PyQt5 funciona!') #crea un titulo para la ventana
label.show() #sirve para mostrar la ventana
# Inicia el bucle de eventos de la aplicación
app.exec_()