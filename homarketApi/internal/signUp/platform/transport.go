package platform

import (
	"context"
	"encoding/json"
	"github.com/go-kit/kit/endpoint"
	httptransport "github.com/go-kit/kit/transport/http"
	"github.com/gorilla/mux"
	"log"
	"net/http"
)

func DecodeRequest(ctx context.Context, r *http.Request) (interface{}, error) {
	var request User
	if err := json.NewDecoder(r.Body).Decode(&request); err != nil {
		log.Print("error decoding request")
		return nil, err
	}
	return request, nil
}

func EncodeResponse(ctx context.Context, w http.ResponseWriter, response interface{}) error {
	w.Header().Set("Content-Type", "application/json; charset=utf-8")
	resp, _ := response.(ProccessResponse)
	return json.NewEncoder(w).Encode(resp.Code)
}

func NewHttpCaseHandler(path string, endpoint endpoint.Endpoint) http.Handler {
	r := mux.NewRouter()
	r.Handle(path,
		httptransport.NewServer(endpoint, DecodeRequest, EncodeResponse)).Methods(http.MethodPost)
	return r
}
