package platform

import (
	"context"
	"github.com/go-kit/kit/endpoint"
	"homarket/internal/signUp"
	"log"
)

func MakeSetUserEndpoint(s signUp.SignUpSevice) endpoint.Endpoint {
	return func(ctx context.Context, request interface{}) (interface{}, error) {
		req := request.(User)
		ctx = context.Background()
		resp, err := s.Process(ctx, req.Nombre, req.Email, req.Telefono, req.Password, req.Categoria)
		if err != nil {
			log.Print("something bad in procces service")
			return nil, err
		}
		return ProccessResponse{
			Code: resp.Message,
		}, nil
	}
}

type User struct {
	Nombre    string `json:"nombre"`
	Email     string `json:"email"`
	Telefono  int64  `json:"telefono"`
	Password  string `json:"password"`
	Categoria string `json:"categoria"`
}

type ProccessResponse struct {
	Code string `json:"code"`
}
