<footer>
    <div class="footer-content">
        <h4>Anestin Halawa</h4>
        <p>Terima kasih telah mengunjungi portofolio saya. Hubungi saya melalui media sosial berikut:</p>
        <ul class="socials">
            <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://github.com" target="_blank"><i class="fab fa-github"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Anestin Halawa. All rights reserved.</p>
    </div>

    <style>
        footer {
            background: linear-gradient(135deg, #333, #111);
            color: #f4f4f4;
            padding: 40px 5%; /* Adjusted padding for better responsiveness */
            text-align: center;
            font-size: 14px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
        }

        footer .footer-content {
            max-width: 1000px;
            margin: auto;
        }

        footer h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ff6600;
        }

        footer p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #aaa;
        }

        footer .socials {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap; /* Allow social icons to wrap on smaller screens */
        }

        footer .socials li {
            display: inline;
        }

        footer .socials li a {
            text-decoration: none;
            font-size: 24px;
            color: #f4f4f4;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        footer .socials li a:hover {
            color: #ff6600;
            transform: scale(1.1);
        }

        footer .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #444;
            padding-top: 10px;
        }

        footer .footer-bottom p {
            font-size: 14px;
            color: #888;
            margin: 0;
        }

        /* Animasi hover pada footer */
        footer .socials li a:hover {
            color: #ff6600;
            transform: rotate(10deg) scale(1.2);
        }

        /* Media queries untuk perangkat mobile */
        @media (max-width: 768px) {
            footer {
                padding: 30px 5%;
            }

            footer h4 {
                font-size: 20px;
            }

            footer p {
                font-size: 14px;
            }

            footer .socials {
                gap: 15px;
            }

            footer .socials li a {
                font-size: 22px;
            }

            footer .footer-bottom p {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            footer {
                padding: 20px 5%;
            }

            footer h4 {
                font-size: 18px;
            }

            footer p {
                font-size: 12px;
            }

            footer .socials {
                gap: 10px;
            }

            footer .socials li a {
                font-size: 20px;
            }

            footer .footer-bottom p {
                font-size: 10px;
            }
        }
    </style>
</footer>
