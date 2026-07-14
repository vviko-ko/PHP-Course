import { motion } from 'framer-motion';
import { LeafyGreen, ShieldAlert, Droplets, PackageCheck, SunMedium, Users } from 'lucide-react';

export default function Sustainability() {
  const items = [
    {
      icon: <LeafyGreen className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Responsible Sourcing",
      desc: "Neem inputs sourced sustainably, supporting local growers and ecosystems."
    },
    {
      icon: <ShieldAlert className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Reduced Chemical Footprint",
      desc: "Natural alternatives reduce reliance on synthetic, polluting chemicals."
    },
    {
      icon: <Droplets className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Water-Conscious Production",
      desc: "Manufacturing processes designed to minimise water use and waste."
    },
    {
      icon: <PackageCheck className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Eco-Conscious Packaging",
      desc: "Ongoing work toward recyclable and biodegradable packaging solutions."
    },
    {
      icon: <SunMedium className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Climate-Positive Sourcing",
      desc: "Neem cultivation supports soil health and requires minimal irrigation."
    },
    {
      icon: <Users className="w-5 h-5 md:w-6 md:h-6" />,
      title: "Community Impact",
      desc: "Engagement with local farming communities to build sustainable supply chains."
    }
  ];

  return (
    <section id="sustainability" className="py-16 md:py-24 lg:py-32 bg-primary-dark text-white relative overflow-hidden">
      <div className="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary/30 via-primary-dark to-secondary opacity-70"></div>
      
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="text-center max-w-3xl mx-auto mb-12 md:mb-20">
          <span className="text-accent font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Sustainability Commitment</span>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif mb-4 md:mb-6">Built for the Planet, Not Just the Market</h2>
          <p className="text-white/80 font-light text-base md:text-lg leading-relaxed">Sustainability is not an afterthought at EcoNeemTech, it is embedded in how we source, formulate, package, and operate.</p>
        </div>
        
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
          {items.map((item, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
              className="p-6 md:p-8 border-l border-white/20 hover:border-accent transition-colors group"
            >
              <div className="flex items-center gap-3 md:gap-4 mb-4 md:mb-6">
                <div className="text-accent group-hover:scale-110 transition-transform duration-500">
                  {item.icon}
                </div>
                <h4 className="text-lg md:text-xl font-serif">{item.title}</h4>
              </div>
              <p className="text-white/70 font-light text-sm md:text-base leading-relaxed">{item.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
