import json
import os
from eth_account import Account

WALLET_FILE = "wallet/metamask_wallet.json"

def create_or_import_wallet():
    if os.path.exists(WALLET_FILE):
        with open(WALLET_FILE, "r") as f:
            wallet = json.load(f)
            print(f"\n🔐 Wallet already exists!")
            print(f"📍 Address: {wallet['address']}")
            return

    print("🔑 Import MetaMask Wallet (12-word seed phrase):")
    mnemonic = input(">> ")

    acct = Account.from_mnemonic(mnemonic.strip())
    wallet = {
        "address": acct.address,
        "private_key": acct.key.hex()
    }

    os.makedirs("wallet", exist_ok=True)
    with open(WALLET_FILE, "w") as f:
        json.dump(wallet, f, indent=4)

    print("\n✅ Wallet Imported Successfully!")
    print(f"📍 Address: {wallet['address']}")

if __name__ == "__main__":
    create_or_import_wallet()
