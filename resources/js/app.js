import "./bootstrap";

// resources/js/app.js
window.birthdayCountdown = function (targetDate) {
    return {
        target: new Date(targetDate).getTime(),
        partyEnd: new Date("2025-11-27T23:59:59+02:00").getTime(), // 🎉 Party week ends here
        days: "00",
        hours: "00",
        minutes: "00",
        seconds: "00",
        isParty: false,

        init() {
            this.update();
            setInterval(() => this.update(), 1000);
        },

        update() {
            const now = new Date().getTime();

            // 🎉 If it's within the party week
            if (now >= this.target && now <= this.partyEnd) {
                if (!this.isParty) this.startParty();
                this.isParty = true;
                this.days = this.hours = this.minutes = this.seconds = "00";
                return;
            }

            // ⏳ After the party week ends
            if (now > this.partyEnd) {
                document.body.classList.remove("party-mode");
                this.isParty = false;
                return;
            }

            // 🧮 Regular countdown
            const distance = this.target - now;
            if (distance > 0) {
                this.days = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, "0");
                this.hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, "0");
                this.minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, "0");
                this.seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, "0");
            }
        },

        startParty() {
            document.body.classList.add("party-mode");
            this.launchConfetti();
        },

        launchConfetti() {
            const duration = 15 * 1000;
            const animationEnd = Date.now() + duration;
            const defaults = {
                startVelocity: 25,
                spread: 360,
                ticks: 60,
                zIndex: 9999,
            };

            const interval = setInterval(() => {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    clearInterval(interval);
                    return;
                }

                const particleCount = 50 * (timeLeft / duration);
                confetti(
                    Object.assign({}, defaults, {
                        particleCount,
                        origin: { x: Math.random(), y: Math.random() - 0.2 },
                        colors: ["#DAA520", "#FFD700", "#C41E3A", "#FFFFFF"],
                    })
                );
            }, 250);
        },
    };
};
