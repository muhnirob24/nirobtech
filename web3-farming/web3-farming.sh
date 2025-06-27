#!/bin/bash

# ✅ Web3 Farming CLI Script for Termux (MetaMask + Galxe + Logging)
# 📁 Save as: web3-farming.sh
# 📍 Usage: bash web3-farming.sh

# === CONFIG ===
LOG_PATH="/sdcard/web3-log/farming-log.txt"
WALLET="0x64cddc07a0d218118c1a44b2f4cd9b3c8d334e13"  # <-- আপনার MetaMask Wallet

# === START ===
echo ""
echo "==============================="
echo "🌐 Web3 Farming CLI Start"
echo "==============================="
echo ""

echo "📌 Wallet Address: $WALLET"

# Log folder তৈরি করুন
mkdir -p $(dirname "$LOG_PATH")

# === TASK SIMULATION ===
echo "🔗 Visiting Galxe Campaign: Linea Voyage..."
xdg-open "https://galxe.com/Linea/campaigns" &> /dev/null
sleep 5

echo "🔗 Visiting Galxe Campaign: ZetaChain..."
xdg-open "https://galxe.com/ZetaChain/campaigns" &> /dev/null
sleep 5

echo "🔗 Visiting Galxe Campaign: StarkNet..."
xdg-open "https://galxe.com/StarkNet/campaigns" &> /dev/null
sleep 5

# === LOGGING ===
echo "$(date): Visited Galxe Campaigns with Wallet $WALLET" >> "$LOG_PATH"
echo "✅ Tasks opened in browser. Please complete manually."
echo "📁 Log saved at: $LOG_PATH"

echo ""
echo "🪂 Farming Done. Claim manually if available. 💰"
echo "==================================="
