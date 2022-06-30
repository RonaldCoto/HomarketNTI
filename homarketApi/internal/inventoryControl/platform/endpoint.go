package platform

import (
	"context"
	"github.com/go-kit/kit/endpoint"
	"homarket/internal/inventoryControl"
)

func MakeGetPayResponseEndpoint(s inventoryControl.Service) endpoint.Endpoint {
	return func(ctx context.Context, request interface{}) (interface{}, error) {
		req := request.(GetInventoryRequest)
		resp, err := s.GetInventoryResponseService(req.ctx)
		return getInventoryInternalResponse{
			Response: resp,
			Err:      err,
		}, nil
	}
}

type GetInventoryRequest struct {
	ctx context.Context
}

type getInventoryInternalResponse struct {
	Response interface{}
	Err      error
}
