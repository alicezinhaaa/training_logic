from mmap import PAGESIZE
from playwright.sync_api import sync_playwright, expect
import time

with sync_playwright() as p:
    navegador = p.chromium.launch(headless=False)
    pagina = navegador.new_page()
    pagina.goto ("https://suap.ifpb.edu.br/accounts/login/?next=/")
    pagina.locator('//*[@id="id_username"]')
    pagina.fill('//*[@id="id_username"]', '202016610004')
    time.sleep(2)
    pagina.locator('//*[@id="id_password"]')
    pagina.fill('//*[@id="id_password"]', 'senha')
    time.sleep(3)
    pagina.locator('//*[@id="content"]/div[1]/form/div[4]/input').click()
    pagina.fill('//*[@id="__filterinput__"]', 'Dados')
    pagina.goto("https://suap.ifpb.edu.br/edu/aluno/202016610004/")
    expect(pagina).to_have_title('Alice dos Santos Araujo Lourenço (202016610004)')
    pagina.screenshot(path="screenshotSUAP.png", full_page=True)
    time.sleep(10)
    