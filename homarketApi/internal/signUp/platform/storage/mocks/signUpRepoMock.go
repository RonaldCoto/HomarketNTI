package mocks

import (
	"context"
	"errors"
)

type repoMock struct {
}

func NewRepoMock() *repoMock {
	return &repoMock{}
}

func (r *repoMock) Save(ctx context.Context, nombre string, email string, telefono int64, password string, categoria string) error {
	if telefono == 1 {
		return errors.New("failed")
	}
	return nil
}