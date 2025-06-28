# Galxe CLI Quest Runner (Termux Compatible)

This is a rootless Android-compatible CLI-based automation project built for completing and tracking Galxe Web3 quests using MetaMask.

---

## 🔥 Project Goal

Automate and monitor Galxe tasks and airdrops using Termux CLI + Localhost UI.  
No PC, No Browser, No Root Needed.

---

## 📁 Folder Structure
galxe-cli-quest-runner/ ├── wallet/                # MetaMask Wallet Storage ├── quests/                # JSON Quest Data (e.g. zklink, omni) ├── scripts/               # CLI Scripts: Tracker, Claim Checker, Wallet ├── server/                # Optional Flask UI ├── data/                  # Quest database ├── run.sh                 # Launcher script └── README.md

---

## ✅ Features

- 📡 Fetch active Galxe quests
- 🧠 Identify claimable NFTs / tokens
- 🔐 Manage MetaMask wallet via CLI
- 🖥️ Localhost Flask web interface (optional)
- ⏱️ Daily airdrop tracker & notifier

---

## 🚀 How to Use (CLI)

```bash
# Clone / Open this folder
cd ~/nirobtech/galxe-cli-quest-runner

# Step 1: Run main launcher
bash run.sh

# Step 2: Import wallet (if first time)
python scripts/wallet_manager.py

# Step 3: Fetch quests
python scripts/tracker.py

# Step 4: Check claimable rewards
python scripts/claim_checker.py
📦 Requirements

Termux (Android, no root)

Python 3

Modules:

requests

eth-account

flask

beautifulsoup4

rich




---

🌐 External Tools

MetaMask

Galxe

Faucet (QuickNode)

Chainlist



---

🧪 Created by: MUH Nirob 24

Project part of nirobtech Web3 CLI Automation Series.

---

### 🔚 `Ctrl + X`, তারপর `Y` দিন, তারপর `Enter` চাপুন ফাইল সেভ করতে।

---

## ✅ পরবর্তী ধাপ কী করবেন:
`README.md` সম্পন্ন ✅

**এখন কোনটা করবেন?**  
- 🔐 Wallet Manager Script (`wallet_manager.py`)  
- 🧠 Quest Tracker (`tracker.py`)  
- 🪙 Claim Checker (`claim_checker.py`)  
- 🖥️ Flask UI (`app.py`)  
- 🧪 `run.sh` Launcher?
