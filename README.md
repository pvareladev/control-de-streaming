# Web para control de Streaming

Frontend para el control de señales de streaming generadas por un servidor externo y publicadas en Youtube.
Este frontend se usaba en Contenidos TDA para control de señales de Acua Federal, Acua Mayor e Igualdad Cultural.

Las señales originales se tomaban de la matriz del TOM y se ingestaban a un servidor con placas de entrada SDI. Mediante FFMpeg se generaba un stream H.264 y se enviaba mediante RTMP a Youtube.

El frontend permitía visualizar las señales y comprobar su estado, asi como gestionar el servidor. Iniciar / Detener señales, revisar su estado y leer un registro.