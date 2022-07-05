package mocks

import (
	"context"
	"errors"
	userControl2 "homarket/internal/userControl"
)

type userRepoMock struct {
	flag bool
}

func NewUserRepoMock(flag bool) *userRepoMock {
	return &userRepoMock{flag: flag}
}

func (i *userRepoMock) GetUsersFromRepository(ctx context.Context) ([]userControl2.UserRegistersResponse, error) {
	if i.flag == true {
		return nil, errors.New("Failed")
	}

	return []userControl2.UserRegistersResponse{
		{
			Id:        1,
			Nombre:    "jaime",
			Email:     "jaime@gmail.com",
			Telefono:  25895214,
			Password:  "1458",
			Categoria: "A",
		},
		{
			Id:        2,
			Nombre:    "milena",
			Email:     "milena@gmail.com",
			Telefono:  74589632,
			Password:  "456",
			Categoria: "C",
		},
	}, nil
}
