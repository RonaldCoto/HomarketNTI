package signUpLogic

import (
	"context"
	"homarket/internal/signUp"
	"log"
)

type insertService struct {
	repo signUp.SaveRepository
}

func NewInsertService(repo signUp.SaveRepository) *insertService {
	return &insertService{repo: repo}
}
func (i *insertService) Process(ctx context.Context, nombre string, email string, telefono int64, password string, categoria string) (*signUp.ServiceResponse, error) {
	err := i.repo.Save(ctx, nombre, email, telefono, password, categoria)

	if err != nil {
		log.Println("Repo failed")
		return nil, err
	}
	return &signUp.ServiceResponse{Message: "success"}, nil
}
