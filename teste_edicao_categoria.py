from mmap import PAGESIZE
from playwright.sync_api import sync_playwright, expect
import time
 
with sync_playwright() as p:
 
    navegador = p.chromium.launch(headless=False)
    pagina = navegador.new_page()
    pagina.goto("http://localhost/loja/loja/categoria/editar.php?categoria=3")
    time.sleep(2)
    pagina.fill('//*[@id="input_nome_categoria"]','Felicidades mil')
    time.sleep(3)

    locator = pagina.get_by_role("button", name="Atualizar")

    locator.hover()
    locator.click()
    time.sleep(2)


