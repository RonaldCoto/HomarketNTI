package platform

import (
	"context"
	"github.com/go-kit/kit/endpoint"
	userControl2 "homarket/internal/userControl"
)

func MakeGetUserResponseEndpoint(s userControl2.Service) endpoint.Endpoint {
	return func(ctx context.Context, request interface{}) (interface{}, error) {
		req := request.(GetUserRequest)
		resp, err := s.GetUsersResponseService(req.ctx)
		return getUserInternalResponse{
			Response: resp,
			Err:      err,
		}, nil
	}
}

type GetUserRequest struct {
	ctx context.Context
}

type getUserInternalResponse struct {
	Response interface{}
	Err      error
}
