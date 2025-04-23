import { useState } from "@wordpress/element";
import { createRoot } from "@wordpress/element";

const CalculatorForm = () => {
    const [first, setFirst] = useState('');
    const [second, setSecond] = useState('');
    const [result, setResult] = useState(null);

    const handleSubmit = (e) => {
        e.preventDefault();
        setResult(Number(first) + Number(second));
        // clear the input fields after submission
    };

    return (
        <div >
            <form onSubmit={handleSubmit} style={{ display: 'flex', gap: '10px' }}>
                <input
                    type="number"
                    placeholder="מספר ראשון"
                    value={first}
                    onChange={(e) => setFirst(e.target.value)}
                    required
                />
                <input
                    type="number"
                    placeholder="מספר שני"
                    value={second}
                    onChange={(e) => setSecond(e.target.value)}
                    required
                />
                <button type="submit">הוסף</button>
            </form>
            {result !== null && <p>תוצאה: {result} = {second} + {first}</p>}
        </div>
    );
};

const root = createRoot(document.getElementById('sum-calculator'));
root.render(<CalculatorForm />);
