# PremiumGift WordPress Theme

A custom, lightweight, and high-performance WordPress theme designed specifically for selling premium gift cards, subscriptions, and other digital products. This theme is built from the ground up with a focus on speed, SEO, and a seamless user experience.

## Features

*   **Lightweight & Fast:** No bloated code. Built for optimal performance to ensure fast loading times.
*   **WooCommerce Ready:** Deep integration with WooCommerce. Includes custom templates and an optimized checkout process for virtual products.
*   **SEO Optimized:**
    *   Smart breadcrumb support that automatically integrates with popular SEO plugins (Yoast SEO, Rank Math).
    *   Clean and semantic HTML5 markup.
    *   Follows WordPress best practices for theme development.
*   **Ready for the Iranian Market:**
    *   Adds "Iranian Toman" (تومان) and "Iranian Rial" (ریال) as default currencies to WooCommerce.
    *   Optimized checkout process removes unnecessary fields (like shipping address) for virtual products, perfect for the local market.
*   **Developer Friendly:** Clean, commented, and well-organized code. Easy to customize and extend.

## Installation

To install this theme on your WordPress site, follow these steps:

1.  **Download the Theme:** From the GitHub repository page, click on the `Code` button and select `Download ZIP`.
2.  **Go to WordPress Admin:** Log in to your WordPress dashboard.
3.  **Navigate to Themes:** Go to `Appearance` -> `Themes` from the left-hand menu.
4.  **Add New Theme:** Click the `Add New` button at the top of the page, and then click `Upload Theme`.
5.  **Upload ZIP File:** Click `Choose File`, select the `premiumgift-theme.zip` file you downloaded earlier, and click `Install Now`.
6.  **Activate the Theme:** Once the installation is complete, click the `Activate` link.

## Recommended Plugins

For the best experience and to unlock all features, please install and activate the following plugins:

*   **WooCommerce:** Essential for the e-commerce functionality.
*   **An SEO Plugin:** We recommend [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) or [Rank Math](https://wordpress.org/plugins/seo-by-rank-math/) to enable the advanced breadcrumb feature.
*   **A Persian Payment Gateway Plugin:** A plugin for an Iranian payment gateway like ZarinPal or IDPay to process payments.

---
## Local Development with Docker

To make testing and development easy, this project includes a Docker configuration. This allows you to run a full WordPress environment (including a database) on your local machine with just a few commands.

### Prerequisites

*   [Docker](https://www.docker.com/get-started) must be installed on your computer.

### Running the Site Locally

1.  **Clone the Repository:** First, get the project files onto your computer.
2.  **Navigate to the Project Directory:** Open your terminal or command prompt and go into the root directory of the project (the one containing the `docker-compose.yml` file).
3.  **Start the Services:** Run the following command:
    ```bash
    docker-compose up -d
    ```
    This command will download the necessary images (WordPress, MySQL) and start the containers in the background. It might take a few minutes the first time.

4.  **Access the Site:** Once the process is complete, open your web browser and go to `http://localhost:8000`. You will see the standard WordPress installation screen.
5.  **Complete WordPress Setup:** Follow the on-screen instructions to set up WordPress. When you get to the theme selection step, the "PremiumGift" theme will already be there and ready for you to activate.

To stop the services, run `docker-compose down` from the project directory.

---
*This theme was custom-built by Jules, AI Software Engineer.*