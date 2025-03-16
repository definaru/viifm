# Vii

Teie muusikaotsingu assistent 👌🤗💕



## Установка

*Для установки Python-приложения выполните следующие шаги:*



1. Убедитесь, что установлен Python версии 3.7 или выше. Вы можете скачать Python с [официального сайта](https://www.python.org).

2. Клонируйте репозиторий с приложением:
	```bash
	git clone --branch=bot https://github.com/definaru/viifm.git vii
	cd vii
	```
   
3. Установите зависимости из файла requirements.txt:
	```bash
	pip install -r requirements.txt
	```
 
4. Теперь осталось создать два файла в корневой директории:
	```bash
	touch .env moder.db
	```

5. Чтобы бот корректно заработал, создайте запись в файле `.env`

	```bash
	nano .env
	```

	Внутри добавить вот такую запись:
	```
	BOT_TOKEN=''
	ADMINS=[]

	#Ссылка на базу данных
	DB_URL='sqlite+aiosqlite:///moder.db'
	```

	`BOT_TOKEN` - указать нужно, если вы хотите чтобы Telegram бот работал.

	`moder.db`  - Заполнится скриптом.

6. Запустите приложение:
	```bash
	python main.py
	```	
	

Готово 🤗
	
	









