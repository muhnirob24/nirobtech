from flask import Flask, render_template, request
import os, json

app = Flask(__name__)

def get_battery():
    return os.popen('termux-battery-status').read()

def get_device():
    return os.popen('termux-device-info').read()

def get_clipboard():
    return os.popen('termux-clipboard-get').read()

@app.route('/')
def index():
    battery = json.loads(get_battery())
    device = json.loads(get_device())
    clipboard = get_clipboard()
    return render_template('index.html', battery=battery, device=device, clipboard=clipboard)

@app.route('/set_clipboard', methods=['POST'])
def set_clipboard():
    data = request.form['clip']
    os.system(f'echo "{data}" | termux-clipboard-set')
    return 'Clipboard Updated'

@app.route('/run', methods=['POST'])
def run_cmd():
    cmd = request.form['cmd']
    result = os.popen(cmd).read()
    return f"<pre>{result}</pre>"

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
