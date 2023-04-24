from mmap import PAGESIZE
from playwright.sync_api import sync_playwright, expect
import time

with sync_playwright() as p:

    navegador = p.chromium.launch(headless=False)
    pagina = navegador.new_page()
    pagina.goto("https://www.grafitte.com.br/")
    time.sleep(1)
    pagina.goto("https://www.grafitte.com.br/conta/login")
    pagina.fill('//*[@id="id_email"]','hp3478bb@gmail.com')
    time.sleep(3)
    pagina.fill('//*[@id="id_senha"]','R2D2C3POBB8')
    time.sleep(2)
    pagina.locator('//*[@id="corpo"]/div/div[1]/div[2]/div[1]/div/form/fieldset/div[2]/div/button').click()
    time.sleep(2)
    pagina.fill('//*[@id="auto-complete"]', 'caderno espiral')
    pagina.locator('//*[@id="form-buscar"]/button').click()
    pagina.locator('//*[@id="listagemProdutos"]/ul/li[1]/ul/li[4]/div/a[2]').click()
    pagina.locator('//*[@id="corpo"]/div/div[1]/div/div[1]/div[2]/div/div[2]/div/ul/li[2]/a/span').click()
    pagina.locator('//*[@id="corpo"]/div/div[1]/div/div[1]/div[2]/div/div[5]/div[3]/a').click()
    # expect(pagina.locator('//*[@id="content"]/div[2]/h2')).to_contain_text('Alice dos Santos Araujo Lourenço')
    # time.sleep(1)
    # pagina.screenshot(path="screenshotSUAP.png", full_page=True)
    time.sleep(10)