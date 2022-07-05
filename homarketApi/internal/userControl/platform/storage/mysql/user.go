package mysql

type UserRegistersResponse struct {
	Id        int64  `db:"id"`
	Nombre    string `db:"nombre"`
	Email     string `db:"email"`
	Telefono  int64  `db:"telefono"`
	Password  string `db:"password"`
	Categoria string `db:"Categoria"`
}
