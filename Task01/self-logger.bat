@echo off
where sqlite3>nul 2>nul
if %ERRORLEVEL% NEQ 0 ( echo ������� sqlite3 �� ������� & pause & exit ) 
echo create table if not exists logger(User varchar(10), Date text default current_timestamp); | sqlite3 logger.db
echo insert into logger values('%USERNAME%', datetime('now', 'localtime')); | sqlite3 logger.db

echo ��� �ணࠬ��: %~nx0
echo|<nul set /p="������⢮ ����᪮�: "
echo select count(*) from logger; | sqlite3 logger.db
echo|<nul set /p="���� �����: "
echo select Date from logger order by Date asc limit 1; | sqlite3 logger.db

echo.
echo select * from logger; | sqlite3 -table logger.db
echo. 

pause