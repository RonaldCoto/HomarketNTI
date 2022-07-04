package inventoryControl

import "context"

type Service interface {
	GetUsersResponseService(ctx context.Context) ([]UserRegistersResponse, error)
}

type Repository interface {
	GetUsersFromRepository(ctx context.Context) ([]UserRegistersResponse, error)
}

type UserRegistersResponse struct {
	Id        int64  `json:"id"`
	Nombre    string `json:"nombre"`
	Email     string `json:"email"`
	Telefono  int64  `json:"telefono"`
	Password  string `json:"password"`
	Categoria string `json:"Categoria"`
}
