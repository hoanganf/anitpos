FROM java:8
COPY . app/
RUN chmod 775 app/run.sh
ENTRYPOINT ["app/run.sh"]
EXPOSE 8787
