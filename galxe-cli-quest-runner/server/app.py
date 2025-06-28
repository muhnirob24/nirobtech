from flask import Flask, render_template_string
import json
import os

app = Flask(__name__)

# Simple template for showing quests and wallet info
TEMPLATE = """
<!doctype html>
<title>Galxe CLI Quest Runner</title>
<h1>Galxe CLI Quest Runner</h1>

<h2>Wallet Info</h2>
<pre>{{ wallet }}</pre>

<h2>Active Quests</h2>
<pre>{{ quests }}</pre>
"""

def load_wallet():
    try:
        with open('wallet/metamask_wallet.json') as f:
            return json.dumps(json.load(f), indent=4)
    except:
        return "No wallet found."

def load_quests():
    try:
        with open('quests/zklink.json') as f:
            return f.read()
    except:
        return "No quests found."

@app.route('/')
def home():
    wallet = load_wallet()
    quests = load_quests()
    return render_template_string(TEMPLATE, wallet=wallet, quests=quests)

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000)
