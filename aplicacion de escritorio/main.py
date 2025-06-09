from PyQt5.QtWidgets import QApplication, QMainWindow, QAction, QStackedWidget, QMessageBox
from add_product_widget import AddProductWidget
from inventory_widget import InventoryWidget
import sys

class MainWindow(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle('Sistema de Inventario - Tienda')
        self.inventory = []
        self.stacked = QStackedWidget()
        self.add_product_widget = AddProductWidget(self.inventory)
        self.inventory_widget = InventoryWidget(self.inventory)
        self.stacked.addWidget(self.add_product_widget)
        self.stacked.addWidget(self.inventory_widget)
        self.setCentralWidget(self.stacked)
        self.create_menu()

    def create_menu(self):
        menubar = self.menuBar()
        inventario_menu = menubar.addMenu('Inventario')
        add_action = QAction('Agregar producto', self)
        view_action = QAction('Ver inventario', self)
        add_action.triggered.connect(self.show_add_product)
        view_action.triggered.connect(self.show_inventory)
        inventario_menu.addAction(add_action)
        inventario_menu.addAction(view_action)

    def show_add_product(self):
        self.stacked.setCurrentWidget(self.add_product_widget)
        self.inventory_widget.refresh_table()

    def show_inventory(self):
        self.inventory_widget.refresh_table()
        self.stacked.setCurrentWidget(self.inventory_widget)

app = QApplication(sys.argv)
window = MainWindow()
window.show()
sys.exit(app.exec_())