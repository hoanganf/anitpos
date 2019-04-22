#!/bin/bash
#this is a comment-the first line sets bash as the shell script
echo Starting the jWebSocket Server...
export JWEBSOCKET_HOME=app
java -jar app/libs/jWebSocketServer-1.0.jar %1 %2 %3 %4 %5 %6 %7 %8 %9
echo "OK"
