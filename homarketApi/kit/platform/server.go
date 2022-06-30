package platform

import (
	"fmt"
	kitlog "github.com/go-kit/kit/log"
	"net/http"
	"os"
	"os/signal"
	"syscall"
)

type Server struct {
	mux    http.ServeMux
	logger kitlog.Logger
}

func NewServer(logger kitlog.Logger) Server {
	svc := Server{
		mux:    *http.NewServeMux(),
		logger: logger,
	}
	return svc
}

func (s *Server) Run(port string) {

	errs := make(chan error, 2)
	go func() {
		s.logger.Log("transport", "http", "address", port, "msg", "listening")
		errs <- http.ListenAndServe(":"+port, &s.mux)
	}()
	go func() {
		c := make(chan os.Signal)
		signal.Notify(c, syscall.SIGINT)
		signal.Notify(c, syscall.SIGTERM)
		errs <- fmt.Errorf("%s", <-c)
	}()

	s.logger.Log("terminated", <-errs)

}

func (s *Server) RegisterRoutes(path string, handler http.Handler) {
	s.mux.Handle(path, handler)
}
