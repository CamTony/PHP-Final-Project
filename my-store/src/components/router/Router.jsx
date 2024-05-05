import { Routes, Route } from 'react-router-dom';
import Home from '../pages/Home';
import LoginPage from '../pages/LoginPage';
import Login from '../login/Login';

function Router() {

    return (
        <Router>
            <Routes>
                <Route path='/' element={<LoginPage/>}/>
            </Routes>
        </Router>
        
    )
}

export default Router;