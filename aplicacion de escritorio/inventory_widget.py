from PyQt5.QtWidgets import QWidget, QVBoxLayout, QTableWidget, QTableWidgetItem, QLabel, QPushButton, QHBoxLayout, QInputDialog, QMessageBox

class InventoryWidget(QWidget):
    def __init__(self, inventory):
        super().__init__()
        self.inventory = inventory
        self.init_ui()

    def init_ui(self):
        layout = QVBoxLayout()
        title = QLabel('Inventario actual')
        title.setStyleSheet('font-size: 20px; font-weight: bold; margin-bottom: 10px; color: #2c3e50;')
        self.table = QTableWidget()
        self.table.setColumnCount(3)
        self.table.setHorizontalHeaderLabels(['Nombre', 'Cantidad', 'Precio'])
        self.table.setStyleSheet('font-size: 14px;')
        self.table.horizontalHeader().setStyleSheet('font-weight: bold; background: #2980b9; color: white;')
        self.table.setAlternatingRowColors(True)
        self.table.setStyleSheet('alternate-background-color: #f2f2f2; background-color: #ffffff;')
        layout.addWidget(title)
        layout.addWidget(self.table)
        # Botones de editar y eliminar
        btn_layout = QHBoxLayout()
        self.edit_btn = QPushButton('Editar producto')
        self.delete_btn = QPushButton('Eliminar producto')
        self.edit_btn.clicked.connect(self.edit_product)
        self.delete_btn.clicked.connect(self.delete_product)
        btn_layout.addWidget(self.edit_btn)
        btn_layout.addWidget(self.delete_btn)
        layout.addLayout(btn_layout)
        self.setLayout(layout)
        self.setStyleSheet('background-color: #ecf0f1;')
        self.refresh_table()

    def refresh_table(self):
        self.table.setRowCount(len(self.inventory))
        for row, item in enumerate(self.inventory):
            self.table.setItem(row, 0, QTableWidgetItem(item['nombre']))
            self.table.setItem(row, 1, QTableWidgetItem(str(item['cantidad'])))
            self.table.setItem(row, 2, QTableWidgetItem(f"{item['precio']:.2f}"))

    def edit_product(self):
        row = self.table.currentRow()
        if row == -1:
            QMessageBox.warning(self, 'Error', 'Selecciona un producto para editar.')
            return
        item = self.inventory[row]
        nombre, ok1 = QInputDialog.getText(self, 'Editar nombre', 'Nombre:', text=item['nombre'])
        if not ok1:
            return
        cantidad, ok2 = QInputDialog.getInt(self, 'Editar cantidad', 'Cantidad:', value=item['cantidad'], min=0)
        if not ok2:
            return
        precio, ok3 = QInputDialog.getDouble(self, 'Editar precio', 'Precio:', value=item['precio'], min=0, decimals=2)
        if not ok3:
            return
        self.inventory[row] = {'nombre': nombre, 'cantidad': cantidad, 'precio': precio}
        self.refresh_table()
        QMessageBox.information(self, 'Éxito', 'Producto editado correctamente.')

    def delete_product(self):
        row = self.table.currentRow()
        if row == -1:
            QMessageBox.warning(self, 'Error', 'Selecciona un producto para eliminar.')
            return
        confirm = QMessageBox.question(self, 'Confirmar', '¿Seguro que deseas eliminar este producto?', QMessageBox.Yes | QMessageBox.No)
        if confirm == QMessageBox.Yes:
            del self.inventory[row]
            self.refresh_table()
            QMessageBox.information(self, 'Éxito', 'Producto eliminado.')
