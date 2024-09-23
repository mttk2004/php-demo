<?php

namespace Core;

class ResponseCode {
  const int OK = 200;
  const int CREATED = 201;
  const int ACCEPTED = 202;
  const int NO_CONTENT = 204;
  const int BAD_REQUEST = 400;
  const int UNAUTHORIZED = 401;
  const int FORBIDDEN = 403;
  const int NOT_FOUND = 404;
  const int METHOD_NOT_ALLOWED = 405;
  const int CONFLICT = 409;
  const int INTERNAL_SERVER_ERROR = 500;
}
