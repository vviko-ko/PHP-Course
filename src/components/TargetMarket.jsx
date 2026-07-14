import { motion } from 'framer-motion';
import { Home, Building2, Landmark, Store } from 'lucide-react';

export default function TargetMarket() {
  const markets = [
    {
      icon: <Home className="w-8 h-8 text-primary" />,
      title: "Households",
      desc: "Families seeking safe, natural, chemical-free personal and home care."
    },
    {
      icon: <Building2 className="w-8 h-8 text-primary" />,
      title: "Institutions",
      desc: "Schools, clinics, hotels & offices seeking sustainable hygiene supplies."
    },
    {
      icon: <Landmark className="w-8 h-8 text-primary" />,
      title: "Government & NGOs",
      desc: "Public health and environmental programmes across Nigeria."
    },
    {
      icon: <Store className="w-8 h-8 text-primary" />,
      title: "Retail & Distribution",
      desc: "Pharmacies, supermarkets, and FMCG distributors nationwide."
    }
  ];

  return (
    <section id="target-market" className="py-16 md:py-24 lg:py-32 bg-white relative border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-12 md:mb-20">
          <span className="text-primary font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Target Market</span>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-primary-dark">Who We Serve</h2>
        </div>
        
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
          {markets.map((market, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, margin: "-100px" }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
              className="bg-bg-body p-6 md:p-8 lg:p-10 border border-primary-light/30 hover:border-primary-dark/20 transition-colors group"
            >
              <div className="mb-6 md:mb-8 text-primary">
                {market.icon}
              </div>
              <h4 className="text-lg md:text-xl font-serif text-primary-dark mb-3 md:mb-4">{market.title}</h4>
              <p className="text-sm md:text-base text-text-muted font-light leading-relaxed">{market.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
