import pyautogui as py

import time

py.alert('O PROGRAMA VAI INICIAR')
time.sleep(3)

py.press('win')
py.write('bloco de notas')
py.press('enter')

time.sleep(3)

py.write('you are smart and beautiful')

time.sleep(5)

py.hotkey('ctrl', 's')
py.press('enter')
time.sleep(3)

py.alert('O PROGRAMA FOI FINZALIZADO')