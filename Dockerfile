FROM ubuntu:latest
LABEL authors="raskal"

ENTRYPOINT ["top", "-b"]
