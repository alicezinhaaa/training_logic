from mmap import PAGESIZE
from playwright.sync_api import sync_playwright, expect
import time
 
with sync_playwright() as p:
 
    navegador = p.chromium.launch(headless=False)
    pagina = navegador.new_page()
    pagina.goto("http://localhost/loja/loja/produto/listar_produto.php")
    time.sleep(3)
    pagina.goto("http://localhost/loja/loja/produto/editar_produto.php?produto=4")
    pagina.fill('//*[@id="input_nome_produto"]','Love Potion')
    time.sleep(2)

    locator = pagina.get_by_role("button", name="Atualizar")

    locator.hover()
    locator.click()
    time.sleep(4)