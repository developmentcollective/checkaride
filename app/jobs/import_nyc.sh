# delete log files older than 30 days....
find ../../logs -name nyc_import_cars_*.log -type f -mtime +30 -exec rm -f {} \;

NOW=$(date +"%b-%d-%y")
LOGFILE="../../logs/nyc_import_cars_$NOW.log"

wget --output-file=$LOGFILE --output-document=../../content/nyc/current_black_car_vehicles.xls nyc.gov/html/tlc/downloads/excel/current_black_car_vehicles.xls 
php -f import_nyc.php >> $LOGFILE 2>&1

