FROM node:latest
ENV NODE_ENV development
ENV PORT 3000

WORKDIR /var/www/flashrun

ENTRYPOINT npm install --allow-root && npm run watch --watch-poll
#
#RUN node
#ENTRYPOINT node
#ENTRYPOINT npm run watch --watch-poll
#RUN ls -la

#RUN npm start




#COPY package.json /usr/src/app/

#RUN npm install
#USER node
#RUN npm run watch
#EXPOSE 8081
#RUN mkdir /usr/src/app
#WORKDIR /usr/src/app

# Create and define the node_modules's cache directory.
#RUN mkdir /usr/src/cache
#WORKDIR /usr/src/cache
#RUN apt-get update && apt-get install -y npm



#RUN pwd
#COPY package.json /usr/src/app

#RUN npm install
#COPY package.json .
#COPY package-lock.json ./
#RUN npm install
#CMD ["npm", "watch", "--watch-poll"]
#RUN npm run watch --watch-poll


EXPOSE 3000