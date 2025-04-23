<?php

class Calculator
{
    /**
     * Register hooks.
     *
     * @return void
     */
    public function register()
    {
        add_shortcode('sum_calculator', [ $this, 'sum_calculator_shortcode' ]);
        add_shortcode('multiplication_calculator', [ $this, 'multiplication_calculator_shortcode' ]);
        add_action('wp_enqueue_scripts', [ $this, 'enqueue_assets' ]);
    }

    /**
     * Enqueue JavaScript and CSS assets.
     *
     * @return void
     */
    public function enqueue_assets()
    {
        wp_enqueue_script(
            'calculator-form',
            plugins_url('../build/index.js', __FILE__),
            [ 'wp-element' ],
            '1.0.0',
            true
        );

        wp_enqueue_style(
            'calculator-style',
            plugins_url('../build/index.css', __FILE__),
            [],
            '1.0.0'
        );
    }

    /**
     * Render the calculator form.
     *
     * @return string
     */
    public function sum_calculator_shortcode()
    {
        ob_start();
        ?>
        <div id="sum-calculator"></div>
        <?php
        return ob_get_clean();
    }

    /**
     * Render the multiplication calculator form.
     *
     * @return string
     */
    public function multiplication_calculator_shortcode()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_number'], $_POST['second_number'])) {
            $first = floatval($_POST['first_number']);
            $second = floatval($_POST['second_number']);
            $result = $first * $second;
        } else {
            $result = null;
        }

        ob_start();
        ?>
        <form method="post" style="display: flex; gap: 10px;">
            <input type="number" name="first_number" placeholder="מספר ראשון" required />
            <input type="number" name="second_number" placeholder="מספר שני" required />
            <button type="submit">הכפל</button>
        </form>
        <?php if ($result !== null) : ?>
            <p>תוצאה: <?php echo htmlspecialchars($result . ' = ' . $first . ' * ' . $second); ?></p>
        <?php endif; ?>
        <?php
        return ob_get_clean();
    }
}
