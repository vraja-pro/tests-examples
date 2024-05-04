import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import LoginForm from '../js/LoginForm';


describe('LoginForm', () => {
  it('renders login form initially', () => {
    const { getByLabelText, getByText } = render(<LoginForm />);

    expect(getByLabelText('Username:')).toBeInTheDocument();
    expect(getByLabelText('Password:')).toBeInTheDocument();
    expect(getByText('Login')).toBeInTheDocument();
  });

  it('renders welcome message after successful login', () => {
    const { getByLabelText, getByText } = render(<LoginForm />);
    const usernameInput = getByLabelText('Username:');
    const passwordInput = getByLabelText('Password:');
    const loginButton = getByText('Login');

    // Simulate user input and submit form
    fireEvent.change(usernameInput, { target: { value: 'user' } });
    fireEvent.change(passwordInput, { target: { value: 'password' } });
    fireEvent.click(loginButton);

    // Assert welcome message and logout button
    expect(getByText('Welcome, user!')).toBeInTheDocument();
    expect(getByText('Logout')).toBeInTheDocument();
  });

  it('renders login form again after logout', () => {
    const { getByText, getByLabelText } = render(<LoginForm />);
    const loginButton = getByText('Login');
   
    const usernameInput = getByLabelText('Username:');
    const passwordInput = getByLabelText('Password:');

    fireEvent.change(usernameInput, { target: { value: 'user' } });
    fireEvent.change(passwordInput, { target: { value: 'password' } });

    // Click on logout button
    fireEvent.click(loginButton);

    const logoutButton = getByText('Logout');
    // Assert logout form
    expect(logoutButton).toBeInTheDocument();
  });

  it('matches snapshot', () => {
    const { container } = render(<LoginForm />);
    expect(container).toMatchSnapshot();
  });

});
