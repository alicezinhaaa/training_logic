import pyautogui
import time as t
# alias é apelido em inglês e quando vc tira 'lia', fica 'as'

# pyautogui.click(23,873)
pyautogui.hotkey('win','r')
pyautogui.write('notepad')
pyautogui.press('enter')
t.sleep(1)

texto = 'Voce foi hackeado.'

for i in range(len(texto)):
	pyautogui.write(str(texto[i]))

# pyautogui.write(texto)