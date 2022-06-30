package signUp

import "context"

type SaveRepository interface {
	Save(ctx context.Context, nombre string, email string, telefono int64, password string, categoria string) error
}

type SignUpSevice interface {
	Process(ctx context.Context, nombre string, email string, telefono int64, password string, categoria string) (*ServiceResponse, error)
}

type ServiceResponse struct {
	Message string `json:"message"`
}
