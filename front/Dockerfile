# syntax=docker/dockerfile:1.7

FROM node:20.13.1-bookworm

RUN apt-get update; \
    apt-get install -y --no-install-recommends git;\
    rm -rf /var/lib/apt/lists/*;

USER node

WORKDIR /code
COPY --chown=node:node code/ /code
RUN npm i

CMD [ "npm", "run", "dev" ]
