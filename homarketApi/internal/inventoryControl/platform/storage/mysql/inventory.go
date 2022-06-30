package mysql

type InventoryRegistersResponse struct {
	Id             int64   `db:"id"`
	Nombre         string  `db:"nombre"`
	Precio         float64 `db:"precio"`
	Existencia     int64   `db:"existencia"`
	Imagen         string  `db:"imagen"`
	IdCategoria    int64   `db:"id_categoria"`
	IdSubCategoria int64   `db:"id_subcategoria"`
}
