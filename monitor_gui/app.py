from flask import Flask, render_template
import subprocess

app = Flask(__name__)

def cmd(command):
    try:
        return subprocess.check_output(command, shell=True).decode('utf-8').strip()
    except subprocess.CalledProcessError:
        return "[!] Command failed: " + command
    except FileNotFoundError:
        return "[!] Command not found: " + command
    except Exception as e:
        return "[!] Error: " + str(e)

@app.route("/")
def home():
    return render_template("index.html",
        ip=cmd("ip addr show wlan0 || ip a"),
        dns1=cmd("getprop net.dns1 || echo 'No DNS info'"),
        dns2=cmd("getprop net.dns2 || echo 'No DNS info'"),
        battery=cmd("termux-battery-status || echo 'Termux API not available'"),
        uptime=cmd("uptime"),
        ram=cmd("free -h || echo 'free command not found'"),
        storage=cmd("df -h /"),
        processes=cmd("ps aux --sort=-%cpu | head -n 10 || echo 'ps error'")
    )

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
