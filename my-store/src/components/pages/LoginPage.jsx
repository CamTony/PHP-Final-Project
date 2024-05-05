import React, { useEffect, useState } from 'react'
import Login from '../login/Login'
import Home from './Home'

function LoginPage() {

    const [isLoggedIn, setIsLoggedIn] = useState(false);


    useEffect(() => {
        if (sessionStorage.getItem('user') != null)
            handleLoginSuccess();
    }, [])

    const handleLoginSuccess = () => {
        document.title = JSON.parse(sessionStorage.getItem('user')).name
        setIsLoggedIn(true);
    };

    return (
        <>

            {!isLoggedIn ?
                <div>
                    <div>
                        <Login onLoginSuccess={handleLoginSuccess} />
                    </div>
                    <div>
                        Create Registration tag
                    </div>
                </div>
                :
                <Home/>
            }     
            
                   
        </>
    );
}

export default LoginPage