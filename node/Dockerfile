FROM node:6.9.5

RUN useradd --user-group --create-home --shell /bin/false app

ENV HOME=/home/app

COPY package.json npm-shrinkwrap.json $HOME/node/
RUN chown -R app:app $HOME/*

USER app 
WORKDIR $HOME/node
RUN npm install
RUN npm cache clean

CMD ["node", "index.js"]