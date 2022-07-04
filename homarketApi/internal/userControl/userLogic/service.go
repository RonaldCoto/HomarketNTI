package userLogic

import (
	"context"
	userControl2 "homarket/internal/userControl"
	"log"
)

type service struct {
	repo userControl2.Repository
}

func NewService(repo userControl2.Repository) *service {
	return &service{repo: repo}
}

func (s *service) GetUsersResponseService(ctx context.Context) ([]userControl2.UserRegistersResponse, error) {
	repoArray, err := s.repo.GetUsersFromRepository(ctx)
	if err != nil {
		log.Println("Repository failed")
		return nil, err
	}

	return repoArray, nil
}
