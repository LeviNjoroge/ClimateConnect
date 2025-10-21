# ClimateConnect 🌍

A comprehensive climate change platform that combines AI-powered assistance, user engagement, and real-time climate data tracking. Our platform connects climate-conscious individuals, provides educational resources, and offers data-driven insights.

## Core Features ✨

### AI Assistant
- Real-time climate data assistance
- Interactive climate education modules
- Industry emissions tracking
- Personalized sustainability recommendations

### User Platform
- User authentication system
- Personal dashboard
- Climate data visualization
- Progress tracking
- Interactive charts and statistics

### Data Analytics
- Worldwide climate statistics
- Regional emission comparisons
- Historical climate data tracking
- Interactive data visualization

## Tech Stack 🛠

### Frontend
- HTML5/CSS3
- JavaScript
- Bootstrap 4
- jQuery
- Chart.js
- Owl Carousel
- Font Awesome

### Backend
- PHP
- MySQL
- Node.js
- Express.js
- Google Gemini AI API

### Database Schema
- Users management
- Climate data storage
- Analytics tracking
- User interactions

## Installation 🚀

1. Clone the repository:
```bash
git clone https://github.com/LeviNjoroge/ClimateConnect
```

2. Database Setup:
```bash
cd ClimateConnect
mysql -u root -p < database/setup.sql
```

3. Configure database connection:
- Edit `connection.php` with your credentials
- Default configuration:
  - Host: localhost
  - Username: root
  - Password: 0000
  - Database: climateconnect

4. Install dependencies:
```bash
npm install
```

5. Environment configuration:
```bash
cp .env.example .env
```
Edit `.env` with your API keys and configuration

6. Start the application:
```bash
npm start
```

## Project Structure 📁

```
ClimateConnect/
├── ClimateConnectAI/
│   ├── components/
│   ├── public/
│   │   ├── css/
│   │   ├── img/
│   │   ├── js/
│   │   ├── lib/
│   │   │   ├── chart/
│   │   │   ├── easing/
│   │   │   ├── owlcarousel/
│   │   └── scss/
├── css/
├── docs/
├── edu/
├── img/
├── js/
├── lib/
│   ├── chart/
│   ├── easing/
│   ├── owlcarousel/
│   ├── tempusdominus/
│   └── waypoints/
├── Otherfiles/
├── public/
└── scss/
    └── bootstrap/
```

## Features Usage 💡

### User Authentication
- Sign up with email
- Secure login system
- Password recovery

### Dashboard
- Personal climate impact tracking
- Progress visualization
- Achievement system

### AI Assistant
- Climate-related queries
- Real-time responses
- Educational resources

### Data Visualization
- Interactive charts
- Regional comparisons
- Historical trends

## Development 🔧

### Requirements
- PHP 7.4+
- Node.js 14+
- MySQL 5.7+
- Web server (Apache/Nginx)

### Setup Development Environment
1. Enable PHP error reporting
2. Configure MySQL development settings
3. Set up local SSL for secure connections

## Contributing 🤝

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request :)

## Testing 🧪

```bash
npm test
```

## Deployment 🚀

1. Configure production environment
2. Set up SSL certificates
3. Configure database backup
4. Set up monitoring

## License 📝

This project is licensed under the MIT License - see [LICENSE.md](LICENSE.md)

## Acknowledgments 🙏

- Google Gemini AI
- Climate data providers
- Open-source community
- Contributors and testers

## Support 💬

For support and queries:
- Create an issue
- Contact: support@climateconnect.com
- Documentation: [docs/](docs/)

## Roadmap 🗺️

- Mobile application development
- Advanced data analytics
- Community features
- API integration expansion

## Version History 📈

- v1.0.0 - Initial Release
- v1.1.0 - AI Integration
- v1.2.0 - Enhanced Analytics
