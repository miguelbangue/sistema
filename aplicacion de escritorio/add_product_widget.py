from PyQt5.QtWidgets import (QWidget, QVBoxLayout, QLabel, QLineEdit, QPushButton, QMessageBox)

class AddProductWidget(QWidget):
    def __init__(self, inventory):
        super().__init__()
        self.inventory = inventory
        self.init_ui()

    def init_ui(self):
        layout = QVBoxLayout()
        self.name_input = QLineEdit()
        self.name_input.setPlaceholderText('Nombre del producto')
        self.qty_input = QLineEdit()
        self.qty_input.setPlaceholderText('Cantidad')
        self.price_input = QLineEdit()
        self.price_input.setPlaceholderText('Precio')
        add_btn = QPushButton('Agregar producto')
        add_btn.clicked.connect(self.add_product)
        layout.addWidget(QLabel('Agregar nuevo producto'))
        layout.addWidget(self.name_input)
        layout.addWidget(self.qty_input)
        layout.addWidget(self.price_input)
        layout.addWidget(add_btn)
        self.setLayout(layout)

    def add_product(self):
        name = self.name_input.text().strip()
        try:
            qty = int(self.qty_input.text())
            price = float(self.price_input.text())
        except ValueError:
            QMessageBox.warning(self, 'Error', 'Cantidad y precio deben ser numéricos.')
            return
        if not name:
            QMessageBox.warning(self, 'Error', 'El nombre no puede estar vacío.')
            return
        self.inventory.append({'nombre': name, 'cantidad': qty, 'precio': price})
        QMessageBox.information(self, 'Éxito', 'Producto agregado.')
        self.name_input.clear()
        self.qty_input.clear()
        self.price_input.clear()
