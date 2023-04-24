import pyautogui as py

import time

py.alert('O SEU PROGRAMA VAI INICIAR')
py.PAUSE = 1

py.hotkey('win','d')
py.moveTo(333, 283)
time.sleep(5)
py.moveTo(1477, 456)
time.sleep(5)
py.moveTo(469, 947)
time.sleep(5)
py.moveTo(1900, 9)
time.sleep(5)

py.alert('O SEU PROGRAMA FINALIZOU')